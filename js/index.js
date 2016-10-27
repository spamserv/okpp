 $(document).ready(function () {

    $('.backup-start').SumoSelect();
    $('.backup-type').SumoSelect();
    $('.backup-tables').SumoSelect({search: true, searchText: 'Enter search criteria.', noMatch: 'There are no tables matching that criteria.'});
    $('.backup-time').SumoSelect({search: true, searchText: 'Enter backup frequency.', noMatch: 'Select one from below.'});
    $('.db-tables').SumoSelect({search: true, searchText: 'Enter search criteria.', noMatch: 'There are no tables matching that criteria.'});

    $('.backup-type').change(function() {
    	var type = $(this).val();

    	if(type == 'S') {
    		$('.div-db-tables').show();
    	} else if(type == 'F') {
    		$('.div-db-tables').hide();
    	}
    });

    $('.backup-start').change(function() {
    	var start = $(this).val();

    	if(start == 'T') {
    		$('.div-backup-tables').hide();
    		$('.div-checkbox').hide();
    		$('.div-backup-time').show();
    	} else if(start == 'C') {
    		$('.div-backup-tables').show();
    		$('.div-checkbox').show();
    		$('.div-backup-time').hide();
    	}
    });

    $('.btn-save-changes').on('click', function() {
    	var arg1 = {};
    	var arg2 = {};
    	var type = $('.backup-type').val();

    	if(type == 'S') {
			var tables = $('.db-tables').val();
			arg1.backup_type = 'S';
			arg1.tables = tables;
    	} else if (type == 'F') {
    		arg1.backup_type = 'F';
    	}

    	var backup_start = $('.backup-start').val();

    	if(backup_start == 'T') {
    		var time_interval = $('.backup-time').val();
    		arg2.backup_start = backup_start;
    		arg2.time_interval = time_interval;
    	} else if( backup_start == 'C') {
    		var backup_tables = $('.backup-tables').val();
    		var checkbox = ( $('.div-checkbox').is(':checked') ? 'true' : 'false' );
    		arg2.backup_start = backup_start;
    		arg2.tables = backup_tables;
    		arg2.delete = checkbox;
    	}

    	$.post(
    		"scripts/start_engine.php",
		    {
		        arg1: JSON.stringify(arg1),
		        arg2: JSON.stringify(arg2)
		    },
		    function(data, status){
		        console.log(status);
	    });

    });

});