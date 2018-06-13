window.onload = function() {

  var baseUrl = OC.generateUrl('/apps/activitylog');
  $.get(baseUrl + "/usr", function(data) {
    var input = document.getElementById("submitU");
    var ids = [];
    for (var i = 0, len = data.length; i < len; i++) {
      ids.push(data[i].uid);
    }
    console.log(ids);
    new Awesomplete(input, {
      list: ids
    });
  });



    $('input[name="daterange"]').daterangepicker({
        "locale": {
            "format": "DD/MM/YYYY"
        },
        "showDropdowns": true,
        "autoApply": true,
        "linkedCalendars": false,
        "startDate": "21/02/2017",
        "endDate": "28/02/2017"
    }, function(start, end, label) {
      //alert(start.getTime());
    });
    var startDate = new Date();
    var endDate = new Date();
    startDate.setHours(0,0,0,0);
    endDate.setHours(23,59,59,0);
    startDate.setDate(startDate.getDate() - 30);
    endDate.setDate(endDate.getDate() + 1);
    $('#submitD').data('daterangepicker').setStartDate(startDate);
    $('#submitD').data('daterangepicker').setEndDate(endDate);
    $('#submitD').on('apply.daterangepicker', function(ev, picker) {
        fetchData(formatStr());
    });
    $("#submitU").keyup(function() {
        fetchData(formatStr());
    });
    $("#submitF").keyup(function() {

        fetchData(formatStr());
    });
    $('input[type=radio][name=submitA]').change(function() {
        fetchData(formatStr());
    });
    $('#paste').click(function() {
      var baseUrl = OC.generateUrl('/apps/activitylog');
      var dt = new Date();
      $.get(baseUrl + "/log/download?name="+dt.getTime()+"&data="+document.getElementById('bod').innerHTML.split('<td>').join("/").split('<tr>').join("\n").split('</td>').join("/").split('</tr>').join("\n"), function(data) {
        alert(data.split("%pastebinresponse%")[1]);
      });
    });
    fetchData(formatStr());
};

function fetchData(str) {
    var baseUrl = OC.generateUrl('/apps/activitylog');
    $.get(baseUrl + "/log/db?q=" + str, function(data) {
        document.getElementById('bod').innerHTML = data;
    });
}

function formatStr() {
    //alert($("input[name=submitA]:checked").val());
    var str = $('#submitU').val().split('|').join(" ") + "|" + document.getElementById("submitD").value + "|" + $("input[name=submitA]:checked").val() + "|" + $('#submitF').val().split('|').join(" ");
    return str;
}
