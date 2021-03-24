const { isEmptyObject, post } = require("jquery");


var i = 1;
$(document).on('click','#addArticle',function (e) {

    console.log($(this).val());
    let id = $(this).val();

    let articles = document.getElementById("articlesOrder");

        let row = document.createElement('div');
        row.setAttribute('class','form-row');
        row.setAttribute('id','row'+id);


        let inputArticleId = document.createElement('input');
        inputArticleId.setAttribute('class','form-control col-sm-1');
        inputArticleId.setAttribute('hidden','true');
        inputArticleId.setAttribute('name','id[]');

        inputArticleId.value = id;
        row.appendChild(inputArticleId);

        let inputNumberArticle = document.createElement('input');
        inputNumberArticle.setAttribute('class','form-control col-sm-1');
        inputNumberArticle.setAttribute('readonly','true');
        inputNumberArticle.value = i++;

        row.appendChild(inputNumberArticle);

        let inputArticleName = document.createElement('input');
        inputArticleName.setAttribute('class','form-control col-sm-4');
        inputArticleName.setAttribute('readonly','true');
        inputArticleName.value = document.getElementById('articleName'+id).value;

        row.appendChild(inputArticleName);

        let inputArticleAmount = document.createElement('input');
        inputArticleAmount.setAttribute('id','inputArticleAmount'+id)
        inputArticleAmount.setAttribute('class','form-control col-sm-2');
        inputArticleAmount.setAttribute('readonly','true');
        inputArticleAmount.setAttribute('name','inputArticleAmount[]');
        inputArticleAmount.value = 1;
        row.appendChild(inputArticleAmount);

        let inputArticleTotal = document.createElement('input');
        inputArticleTotal.setAttribute('class','form-control col-sm-2');
        inputArticleTotal.setAttribute('id','inputArticleTotal'+id);
        inputArticleTotal.setAttribute('readonly','true');
        inputArticleTotal.setAttribute('name','inputArticleTotal[]');
        inputArticleTotal.value = document.getElementById('articleUnitPrice'+id).value;
        row.appendChild(inputArticleTotal);

        articles.appendChild(row);

});

$(document).on('change','#selectOrder',function(e){
    console.log($(this).val());
    let id = $(this).val();
    $.ajax({
        type:'GET',
        url: 'showOrder/'+id,
        //data:{id:id},
        success: function(response){
            let showOrder = document.getElementById('showOrder');
            showOrder.innerHTML = response;
            console.log(showOrder);
            //(response);
        },error(response){
            console.log(response);
        }
    });
});

