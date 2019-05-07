<?php
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
//session_start();
require PATH_LIB."lib-shows.php";
$showLib = new Shows();

switch ($_POST['req']){
  /* [INVALID REQUEST] */
 default:
   die("ERR");
   break;

   /* [SHOW ALL quotes] */
  case "list":
    $quotes = $showLib->getAll();?>
    <h1>MANAGE SHOWS</h1>
    <input type="button" value="Add Show" onclick="show.add()"/>
    <?php
    if (is_array($quotes)) {
        echo "<table>";
        foreach ($quotes as $key=>$q) {
          printf("<tr><td><img src='https://picsum.photos/100/10$key'>Quote: %s Season:%u Episode:%u</td><td>"
            . "<input type='button' value='Delete' onclick='show.del(%u)'>"
            . "<input type='button' value='Edit' onclick='show.edit(%u)'>"
            . "</td></tr>",
            $q['quote'], $q['season'],$q['episode'],
            $q['id'],$q['id']
          );

        }
        echo "</table>";
      }else{
        echo "<div>No Show Quotes Found</div>";
      }
      break;
  /* [ADD/EDIT USER DOCKET] */
  case "addEdit":
    $edit = is_numeric($_POST['id']);
    if ($edit) {
      $quotes = $showLib->getShowByID($_POST['id']);
    } ?>
    <h1><?=$edit?"EDIT":"ADD"?>Quotes</h1>
    <form onsubmit="return show.save()">
      <input type="hidden" id="show_id" value="<?=$_POST['id']?>"/>
      <label for="show_quote">Show Quote:</label>
      <input type="text" id="show_quote"/>
      <label for="show_episode">Episode:</label>
      <input type="number" id="show_episode"/>
      <label for="show_season">Season:</label>
      <input type="number" id="show_season"/>
      <input type="button" value="Cancel" onclick="show.list()"/>
      <input type="submit" value="Save"/>
    </form>
    <?php break;
    case "addForm":
      $edit = is_numeric($_POST['id']);
      if ($edit) {
        $quotes = $showLib->getShowByID($_POST['id']);
        print_r($quotes);

      } ?>
      <h1>Add Quotes</h1>
      <form onsubmit="return show.saveAdd()">
        <label for="show_quote_add">Show Quote:</label>
        <input type="text" id="show_quote_add"/>
        <label for="show_episode_add">Episode:</label>
        <input type="number" id="show_episode_add"/>
        <label for="show_season_add">Season:</label>
        <input type="number" id="show_season_add"/>
        <input type="button" value="Cancel" onclick="show.list()"/>
        <input type="submit" value="Save"/>
      </form>
      <?php break;
      case "editForm":
        $edit = is_numeric($_POST['id']);
        if ($edit) {
          $quotes = $showLib->getShowByID($_POST['id']);
          echo $quote;
        } ?>
        <h1>Edit Quotes</h1>
        <form onsubmit="return show.saveEdit()">
          <input type="hidden" id="show_id_edit" value="<?=$quotes['id']?>"/>
          <label for="show_quote_edit">Show Quote:</label>
          <input type="text" id="show_quote_edit"/>
          <label for="show_episode_edit">Episode:</label>
          <input type="number" id="show_episode_edit"/>
          <label for="show_season_edit">Season:</label>
          <input type="number" id="show_season_edit"/>
          <input type="button" value="Cancel" onclick="show.list()"/>
          <input type="submit" value="Save"/>
        </form>
        <?php break;
    /* [ADD Show] */
    case "add":
      echo $showLib->add( $_POST['episode'], $_POST['season'],$_POST['quote']) ? "OK" : "ERR" ;
      break;
    /* [EDIT Show] */
    case "edit":
      echo $showLib->edit( $_POST['episode'], $_POST['season'], $_POST['quote'],$_POST['id']) ? "OK" : "ERR" ;
      break;
    /* [DELETE Show] */
    case "del":
      echo $showLib->del($_POST['id']) ? "OK" : "ERR" ;
      break;
    }
?>
