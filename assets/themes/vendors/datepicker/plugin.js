require.config({
    shim: {
        'datepicker': ['jquery', 'core']
    },
    paths: {
        'datepicker': 'assets/plugins/datepicker/js/bootstrap-datepicker.min'
    }
});

require(['jquery','datepicker'], function(){
	$(".form_date").datepicker({
        format: "dd-mm-yyyy",
        clearBtn: true,
        autoclose: true,
        todayHighlight: true
    });

	$('.form_date').prop('readonly',true);
});