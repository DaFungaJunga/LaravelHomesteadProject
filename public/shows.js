var show = {
  list: function (){
    //list() : show all show quotes
    adm.load({
      url : "ajax-shows.php",
      target : "container",
      data : {
        req : "list"
      }
    });
  },
  addEdit : function (id) {
  // addEdit() : show add/edit show docket
  // PARAM id : show ID
    adm.load({
      url : "ajax-shows.php",
      target : "container",
      data : {
        req : "addEdit",
        id : id
      }
    });
  },
  add : function () {
  // add() : show add show docket
    adm.load({
      url : "ajax-shows.php",
      target : "container",
      data : {
        req : "addForm",
      }
    });
  },
  edit : function (id) {
  // addEdit() : show edit show docket
  // PARAM id : show ID
    adm.load({
      url : "ajax-shows.php",
      target : "container",
      data : {
        req : "editForm",
        id : id
      }
    });
  },
  save : function () {
  // save() : save user
    var id = document.getElementById("show_id").value;
    adm.ajax({
      url : "ajax-shows.php",
      data : {
        req : (id=="" ? "add" : "edit"),
        id : id,
        quote : document.getElementById("show_quote").value,
        episode : document.getElementById("show_episode").value,
        season : document.getElementById("show_season").value
      },
      //ok : show.list
    });
    return false;
  },
  saveEdit : function () {
  // edit() : edit user
    adm.ajax({
      url : "ajax-shows.php",
      data : {
        req : "edit",
        id :   document.getElementById("show_id_edit").value,
        quote : document.getElementById("show_quote_edit").value,
        episode : document.getElementById("show_episode_edit").value,
        season : document.getElementById("show_season_edit").value
      },
      ok : show.list
    });
    return false;
  },
  saveAdd : function () {
  // add() : add user
    adm.ajax({
      url : "ajax-shows.php",
      data : {
        req : "add",
        quote : document.getElementById("show_quote_add").value,
        episode : document.getElementById("show_episode_add").value,
        season : document.getElementById("show_season_add").value
      },
      ok : show.list,
    });
    return false;
  },
  del : function (id) {
    // del() : delete show
    // PARAM id : show ID
      if (confirm("Delete show?")) {
        adm.ajax({
          url : "ajax-shows.php",
          data : {
            req : "del",
            id : id
          },
          ok : show.list
        });
      }
    }
  };
  window.addEventListener("load", show.list);
