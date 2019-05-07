var shows = {
  list: function (){
    //list() : show all show quotes
    adm.load({
      url : "ajax-shows.php",
      target : "container",
      data : {
        req : "list"
      }
    })
  }
}
