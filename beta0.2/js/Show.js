function change(a){
	if(a==0){
		$("#u0").slideToggle();
		$('#l0').toggleClass('open');	
		$("#u1").slideUp();
		$('#l1').removeClass('open');
		$("#u2").slideUp();
		$('#l2').removeClass('open');
		$("#u3").slideUp();
		$('#l3').removeClass('open');
		$("#u4").slideUp();
		$('#l4').removeClass('open');
	}
	if(a==1){
		$("#u1").slideToggle();
		$('#l1').toggleClass('open');
		$("#u0").slideUp();
		$('#l0').removeClass('open');
		$("#u2").slideUp();
		$('#l2').removeClass('open');
		$("#u3").slideUp();
		$('#l3').removeClass('open');
		$("#u4").slideUp();
		$('#l4').removeClass('open');
	}
	if(a==2){
		$("#u2").slideToggle();
		$('#l2').toggleClass('open');
		$("#u1").slideUp();
		$('#l1').removeClass('open');
		$("#u0").slideUp();
		$('#l0').removeClass('open');
		$("#u3").slideUp();
		$('#l3').removeClass('open');
		$("#u4").slideUp();
		$('#l4').removeClass('open');
	}
	if(a==3){
		$("#u3").slideToggle();
		$('#l3').toggleClass('open');
		$("#u1").slideUp();
		$('#l1').removeClass('open');
		$("#u2").slideUp();
		$('#l2').removeClass('open');
		$("#u0").slideUp();
		$('#l0').removeClass('open');
		$("#u4").slideUp();
		$('#l4').removeClass('open');
	}
	if(a==4){
		$("#u4").slideToggle();
		$('#l4').toggleClass('open');
		$("#u1").slideUp();
		$('#l1').removeClass('open');
		$("#u2").slideUp();
		$('#l2').removeClass('open');
		$("#u3").slideUp();
		$('#l3').removeClass('open');
		$("#u0").slideUp();
		$('#l0').removeClass('open');
	}
}