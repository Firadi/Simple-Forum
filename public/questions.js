async function getNewQuestion(){
    date = new Date();
    response = await fetch('http://192.168.1.13/ds/forum/api/questionsApi.php');
    res = await response.json();
    str='';
    for(let i=0;i<res.length;i++){
        str += `
        <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
            <div class="row align-items-center">
                <div class="col-md-8 mb-3 mb-sm-0">
                    <h5>
                    <a href="index.php?action=question&id=${res[i].id}" class="text-primary">${res[i].question}</a>
                    </h5>
                    <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">${res[i].id}</a> <span class="op-6"> by</span> <a class="text-black" href="#">${res[i].user_name}</a></p>

                </div>
                <div class="col-md-4 op-7">
                    <div class="row text-center op-7">
                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">${res[i].numReplays} Replys</span> </div>
                    <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        
    }
    document.querySelector('.questions').innerHTML = '';
    document.querySelector('.questions').innerHTML = str;
}

setInterval(() => {
    getNewQuestion();
    console.log("test");
}, 30000);
