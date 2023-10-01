function edit_fball(id)
{ 
 var fball_team1=document.getElementById("fball_team1_val"+id).innerHTML;
 var fball_goal1=document.getElementById("fball_goal1_val"+id).innerHTML;
 var fball_team2=document.getElementById("fball_team2_val"+id).innerHTML;
  var fball_goal2=document.getElementById("fball_goal2_val"+id).innerHTML;
  
 document.getElementById("fball_team1_val"+id).innerHTML="<input type='text' id='fball_team1_text"+id+"' value='"+fball_team1+"'>";
 document.getElementById("fball_goal1_val"+id).innerHTML="<input class='form-control' type='text' id='fball_goal1_text"+id+"' value='"+fball_goal1+"'>";
 document.getElementById("fball_team2_val"+id).innerHTML="<input class='form-control' type='text' id='fball_team2_text"+id+"' value='"+fball_team2+"'>";
document.getElementById("fball_goal2_val"+id).innerHTML="<input class='form-control' type='text' id='fball_goal2_text"+id+"' value='"+fball_goal2+"'>";
	
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_fball(id)
{ 
 var fball_team1=document.getElementById("fball_team1_text"+id).value;
 var fball_goal1=document.getElementById("fball_goal1_text"+id).value;
 var fball_team2=document.getElementById("fball_team2_text"+id).value;
 var fball_goal2=document.getElementById("fball_goal2_text"+id).value;
 	
 $.ajax
 ({ 
  type:'post',
  url:'update_total_live.php',
  data:{
   edit_fball:'edit_fball',
   row_id:id,
   fball_team1_val:fball_team1,
   fball_goal1_val:fball_goal1,
   fball_team2_val:fball_team2,
   fball_goal2_val:fball_goal2
   },
  success:function(response) {
	   alert('Update succesfully');
    window.location.reload(true);
  }
 });
}

function delete_fball_live(id)
{
 $.ajax
 ({
  type:'post',
  url:'update_total_live.php',
  data:{
   delete_fball_live:'delete_fball_live',
   row_fball_id:id,
  },
  success:function(response) {
   alert('Deleted succesfully');
    window.location.reload(true);
  }
 });
}

function insert_row()
{
 var name=document.getElementById("new_name").value;
 var fball_team2=document.getElementById("new_fball_team2").value;

 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   insert_row:'insert_row',
   name_val:name,
   fball_team2_val:fball_team2
  },
  success:function(response) {
   if(response!="")
   {
    var id=response;
    var table=document.getElementById("user_table");
    var table_len=(table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='row"+id+"'><td id='name_val"+id+"'>"+name+"</td><td id='fball_team2_val"+id+"'>"+fball_team2+"</td><td><input type='button' class='edit_button' id='edit_button"+id+"' value='edit' onclick='edit_rows("+id+");'/><input type='button' class='save_button' id='save_button"+id+"' value='save' onclick='save_row("+id+");'/><input type='button' class='delete_button' id='delete_button"+id+"' value='delete' onclick='delete_row("+id+");'/></td></tr>";

    document.getElementById("new_name").value="";
    document.getElementById("new_fball_team2").value="";
   }
  }
 });
}