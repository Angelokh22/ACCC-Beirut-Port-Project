async function send_request(items_list) {
    console.log(items_list)
    return fetch('https://translate-pa.googleapis.com/v1/translateHtml', {
        method: 'POST',
        headers: {
            'accept': '*/*',
            'accept-language': 'en-US,en;q=0.9,zh-TW;q=0.8,zh;q=0.7,ar-EG;q=0.6,ar;q=0.5',
            'content-type': 'application/json+protobuf',
            'origin': 'https://www.w3schools.com',
            'referer': 'https://www.w3schools.com/',
            'sec-ch-ua': '"Google Chrome";v="123", "Not:A-Brand";v="8", "Chromium";v="123"',
            'sec-ch-ua-mobile': '?0',
            'sec-ch-ua-platform': '"Windows"',
            'sec-fetch-dest': 'empty',
            'sec-fetch-mode': 'cors',
            'sec-fetch-site': 'cross-site',
            'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36',
            'x-client-data': 'CKy1yQEIiLbJAQiktskBCKmdygEIhOzKAQiSocsBCJv+zAEIhaDNAQjc/M0BGPTJzQEY2IbOAQ==',
            'x-goog-api-key': 'AIzaSyATBXajvzQLTDHEQbcpq0Ihe0vWDHmO520'
        },
        body: JSON.stringify([[items_list,"en","ar"],"te"])
    })
        .then(response => response.json())
        .then(data => {
            return data;
        });
}




function translate_a_to_ar() {

    var a_list = Array.from(document.querySelectorAll("a")).map(el => el.innerText).filter(text => text.trim() !== "");


    send_request(a_list)
        .then(data => {
            resp = data[0]
            resp.splice(6, 0, '<img src="./static/img/united_kingdom.png" alt="">')
            resp.splice(7, 0, '<img src="./static/img/saudi_arabia.png" alt="">')
            for (i = 0; i < resp.length; i++) {
                if (i == 6 || i == 7) {
                    document.querySelectorAll("a")[i].innerHTML = resp[i];
                }
                else {
                    console.log(i)
                    document.querySelectorAll("a")[i].innerText = resp[i];
                }
            }
        })
}

function translate_h1_to_ar() {
    // var a_list = Array.from(document.querySelectorAll("h1")).map(el => el.innerText).filter(text => text.trim() !== "");
    var a_list = ["We Help you to", "import/export", "your desired shipments."]
    send_request(a_list)
        .then(data => {
            resp = data[0];
            tr = resp[1].split("و")
            html = resp[0] + ' <span class="theme-text">'+tr[0]+'\\'+tr[1]+'</span>'+resp[2];
            document.querySelectorAll("h1")[0].innerHTML = html;
        })
}



function translate_to_ar() {
    // translate_a_to_ar();
    translate_h1_to_ar()
}