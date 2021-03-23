const { isEmptyObject, post } = require("jquery");


var i = 1;
$(document).on('click','#addArticle',function (e) {

    console.log($(this).val());
    let id = $(this).val();

    let articles = document.getElementById("articlesOrder");

    if(!isEmptyObject(document.getElementById('row'+id))){
        document.getElementById('inputArticleAmount'+id).value = parseInt(document.getElementById('inputArticleAmount'+id).value)+1;
        document.getElementById('inputArticleTotal'+id).value = parseInt(document.getElementById('articleUnitPrice'+id).value) + parseInt(document.getElementById('inputArticleTotal'+id).value);
    }
    else
    {
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

        let inputArticleTotalWithDiscount = document.createElement('input');
        inputArticleTotalWithDiscount.setAttribute('class','form-control col-sm-2');
        inputArticleTotalWithDiscount.setAttribute('readonly','true');
        inputArticleTotalWithDiscount.setAttribute('id','inputArticleTotalWithDiscount'+id);
        inputArticleTotalWithDiscount.setAttribute('name','inputArticleTotalWithDiscount[]');
        inputArticleTotalWithDiscount.value = 0;
        row.appendChild(inputArticleTotalWithDiscount);

        articles.appendChild(row);

    }
    if(parseInt(document.getElementById('inputArticleAmount'+id).value) >= 5 && parseInt(document.getElementById('inputArticleAmount'+id).value) <= 9 && parseInt(document.getElementById('inputArticleTotal'+id).value) >= 500 ){
        document.getElementById('inputArticleTotalWithDiscount'+id).value =  parseInt(document.getElementById('inputArticleTotal'+id).value) -(parseInt(document.getElementById('inputArticleTotal'+id).value)*(15/100));

    }

});

$(document).on('click','#removeArticle',function (e) {

    //console.log($(this).val());
    let id = $(this).val();

    if(!isEmptyObject(document.getElementById('row'+id))){
        document.getElementById('inputArticleAmount'+id).value = parseInt(document.getElementById('inputArticleAmount'+id).value)-1;
        document.getElementById('inputArticleTotal'+id).value = parseInt(document.getElementById('inputArticleTotal'+id).value) - parseInt(document.getElementById('articleUnitPrice'+id).value);
        if(parseInt(document.getElementById('inputArticleAmount'+id).value) == 0)
            document.getElementById('row'+id).remove();
        if(parseInt(document.getElementById('inputArticleAmount'+id).value) >= 5 && parseInt(document.getElementById('inputArticleAmount'+id).value) <= 9 && parseInt(document.getElementById('inputArticleTotal'+id).value) >= 500 ){
            document.getElementById('inputArticleTotalWithDiscount'+id).value =  parseInt(document.getElementById('inputArticleTotal'+id).value) -(parseInt(document.getElementById('inputArticleTotal'+id).value)*(15/100));

        }
    }
    else
    {
       alert('Item não está na lista.');
    }

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

