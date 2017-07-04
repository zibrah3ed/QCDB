// Create array in preparation for chartist. Aggregate type as string
// array name to be appended, and size of array
function createAggArray(aggregate,array,size){
    var search = '';
    for (i = 0; i < size; i++){
      search = aggregate + (i + 1).toString();
      array[i] = parseInt(document.getElementById(search).innerHTML);
    };
  };

  function goBack() {
      window.history.back();
  };
