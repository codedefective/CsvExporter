var selectAllButton = document.getElementById('selectAll');

function checkOrUncheck(elements, status = true){
    elements.forEach(function(el){
        el.checked = status;
    });
}

function invertReverse(){
    var inputElements = document.querySelectorAll('input[type=checkbox]');
    inputElements.forEach(function(el){
        el.checked = !el.checked;
    });
}

function exportSelected(){
    var inputElements = document.querySelectorAll('input[type=checkbox]');
    var empty = [].filter.call(inputElements, function(el){
        return !el.checked
    });
    if(empty.length === inputElements.length){
        alert('No Rows Selected');
        return false;
    }
    document.getElementById('studentsForm').submit();
}

selectAllButton.onclick = function(e){
    e.preventDefault();
    var inputElements = document.querySelectorAll('input[type=checkbox]');
    if(selectAllButton.dataset.selected === undefined || selectAllButton.dataset.selected === 'false'){
        selectAllButton.dataset.selected = 'true';
        selectAllButton.style.backgroundColor = '#C6C6C6';
        checkOrUncheck(inputElements, true);
    }else{
        selectAllButton.dataset.selected = 'false';
        selectAllButton.removeAttribute("style");
        checkOrUncheck(inputElements, false);
    }
};


function search(){
    var input, filter,tr, td, i, j, tds, ths, matched;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    tr = document.getElementsByTagName('tr');
    
    // Loop through all table rows, and hide
    // those who don't match the search query
    for(i = 0; i < tr.length; i++){
        tds = tr[i].getElementsByTagName('td');
        ths = tr[i].getElementsByTagName('th');
        matched = false;
        
        // leave the row header
        if(ths.length > 0){
            matched = true;
        }else{
            for(j = 0; j < tds.length; j++){
                td = tds[j];
                if(td.innerHTML.toUpperCase().indexOf(filter) > -1){
                    matched = true;
                    break;
                }
                
            }
        }
        if(matched === true){
            tr[i].style.display = '';
        }else{
            tr[i].style.display = 'none';
        }
    }
}

