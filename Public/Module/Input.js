const submit = section.select('button[name="submit"]')

let input = {};

input.init(){




    submit.on('click', (event) => {

        const prompt = section.select('textarea[name="prompt"]').val();
        let data;
        if(_('prototype').string.contains(endpoint, 'chat')){
            let messages = file.data.get('messages.' + section_id) ?? [];
            messages.push(
                {
                    "role": "user",
                    "content": prompt
                }
            );
            file.data.set('messages.' + section_id, messages);
            let tools = [];
            data = {
                "entity": {
                    "endpoint": endpoint,
                    "messages": messages,
                    "tools": tools,
                    "model": model,
                    "think": think,
                    "options": {
                        "stream": true,
                        "num_ctx": num_ctx,
                        "temperature": temperature,
                        "seed": seed
                    }
                }
            }
        } else {
            data = {
                "entity" : {
                    "endpoint": endpoint,
                    "prompt": prompt,
                    "model": model,
                    "think": think,
                    "options": {
                        "stream": true,
                        "num_ctx": num_ctx,
                        "temperature": temperature,
                        "seed": seed
                    }
                }
            };
        }
        const token = user.token();
        header("Authorization", 'Bearer ' + token);
        request(url_backend, data, (url, response) => {
            const start = microtime(true);
            const url_sse = file.data.get('route.backend.sse') + '&uuid=' + response?.node?.uuid;
            let eventSource = new EventSource(url_sse, {
                withCredentials: true,
            });
            data.entity.response = {
                "chunks": [],
                "blob": ''
            };
            let counter = 0;
            let last_event_id = 0;
            let retry = 0;
            let code_depth_multi_line = 0;
            let code_depth_single_line = 0;
            let code_partial_multi_line = '';
            let code_partial_single_line = '';
            let is_thought = false;
            let content = section.select('.content');
            if (content) {
                content.html(content.html() + '<article><span class="prompt">' + prompt + '</span><pre id="response-' + response?.node?.uuid + '"></pre><a id="response-bottom-' + response?.node?.uuid + '"></a></article>');
            }
            let pre = section.select('#response-' + response?.node?.uuid);
            // pre.html(pre.html() +  + "\n\n");
            history.add(section, pre, prompt);
            section.select('textarea[name="prompt"]').val('');
            section.select('textarea[name="prompt"]').focus();
            let a = section.select('#response-bottom-' + response?.node?.uuid);
            if (a) {
                a.scrollIntoView({behavior: 'smooth', block: 'center', inline: 'start'})
                // a.scrollIntoView();
            }
        });
    });
}

