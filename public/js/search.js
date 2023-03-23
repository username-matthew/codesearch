function doSearch() {
    var search = document.getElementById("search")
    var els =  document.querySelectorAll(".card")
  
    search.addEventListener("keyup", function() {
    Array.prototype.forEach.call(els, function(card) {
      var values = search.value.split(' ')
      var display = true
      
      for (var i = 0; i < values.length; i++) {
        if(card.textContent.trim().indexOf(values[i]) === -1)
          display = false
      }
      card.style.display = display ? '' : 'none'
    })
})
}
