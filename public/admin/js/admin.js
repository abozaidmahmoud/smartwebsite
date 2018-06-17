
$('.del_but').on('click',function(){
	var res=confirm('are you sure to delete');
	if(res==true){
		return true;
	}
	else{
		return false;
	}
});