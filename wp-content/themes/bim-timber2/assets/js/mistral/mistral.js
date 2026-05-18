import { Mistral } from '@mistralai/mistralai';

export class ChatManager {
	
	constructor(el) {
        this.el = el;
        this.request = el.querySelector('.__request');
        this.window = el.querySelector('.__window');
        this.chat = el.querySelector('.__send');

        const apiKey = "JVlkmGdZiCzBrk0HsQhmbrAGBX1Uy7Gn";
        this.client = new Mistral({apiKey: apiKey});


        this.chat.addEventListener('click', this.query.bind(this));
	}

    async query(el){
        let requestText = this.request.value;

        if(requestText){
            const chatResponse = await this.client.agents.complete({
                agentId: "ag:50c16057:20250228:bim-bot:9c5764b0",
                messages: [{role: 'user', content: requestText}]
            });

            this.window.insertAdjacentHTML('beforeend', "<div>"+ chatResponse.choices[0].message.content +"</div>")

        }
    }

    
}

[].forEach.call(document.querySelectorAll('.__chatbot'), (el) => {
    new ChatManager(el);
});