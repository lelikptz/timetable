;
'use strict';
$(function () {

    $(document).on('change', '#timetable-region_id', function () {
        changeDate();
    });

    $(document).on('change', '#timetable-date_start', function () {
        changeDate();
    });

    $(document).on("pjax:end", function () {
        changeDate();
    });

    changeDate();

    function changeDate() {
        var duration = +$('#timetable-region_id').find('option:selected').data('duration');
        var dateStartVal = $('#timetable-date_start').val() || null;
        var date = (dateStartVal) ? new Date(dateStartVal) : new Date();
        date.setDate(date.getDate() + duration);
        var d = date.getFullYear() + '-' + pad(date.getMonth() + 1) + '-' + pad(date.getDate());
        $('.act-date-to').val(d);
    }

    function pad(str) {
        str = '' + str;
        return str.length < 2 ? '0' + str : str;
    }
});