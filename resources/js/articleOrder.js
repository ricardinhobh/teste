var i = 0;
$(document).on('click','#addArticle',function (e) {

    console.log($(this).val());
    let id = $(this).val();

    let articles = document.getElementById("articles");


    let tbody = document.createElement('tbody');
    let tr = document.createElement('tr');
    let td = document.createElement('td');
    let th = document.createElement('th');
    th.scope = 'row';
    th.appendChild(document.createTextNode(i+1));
    tr.appendChild(th);
    td.appendChild(document.createTextNode(document.getElementById('articleName'+id).value));
    tr.appendChild(td);
    tbody.appendChild(td);
console.log(tbody);
    articles.appendChild(tbody);
});
