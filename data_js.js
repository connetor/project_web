	$(document).ready( function() {
	    let now = new Date();
	 
	    let day = ("0" + now.getDate()).slice(-2);
	    let month = ("0" + (now.getMonth() + 1)).slice(-2);

	    let today = (day)+"-"+(month)+"-"+ now.getFullYear();


	   $('#datePicker').val(today);
	    
	    $('#datebtn').click(function(){
	        
	        testClicked();
	        
	    });
	});
	function testClicked()
	{
	  $('.getDate').html($('#datePicker').val());
	}

	function add_newmember(){
		var data_member = $('#new_data').serializeArray();
		$.ajax({
			url:'phpdata/add_newmember.php',
			type:'post',
			data:data_member,
			success:function(res){
				location.reload();
			}
		})
	}

	function add_newworker(){
		var data_member = $('#new_data').serializeArray();
		$.ajax({
			url:'phpdata/add_newworker.php',
			type:'post',
			data:data_member,
			success:function(res){
				alert(res)
			}
		})
	}

	function worker(){
		$('#workonly').load("workonly.html");
		$('#submit_addnew').attr('onclick','add_newworker()')
	}

	function member(){
		$('#workonly').html(" ");
		$('#submit_addnew').attr('onclick','add_newmember()')

	}