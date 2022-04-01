function updateClock() {
    var now = new Date();
    var dname = now.getDay(),
      mo = now.getMonth(),
      dnum = now.getDate(),
      yr = now.getFullYear(),
      hou = now.getHours(),
      min = now.getMinutes(),
      sec = now.getSeconds(),
      pe = "AM";

    if (hou >= 12) {
      pe = "PM";
    }
    if (hou == 0) {
      hou = 12;
    }
    if (hou > 12) {
      hou = hou - 12;
    }

    Number.prototype.pad = function(digits) {
      for (var n = this.toString(); n.length < digits; n = 0 + n);
      return n;
    }

    var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
    var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
    var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
    for (var i = 0; i < ids.length; i++)
      document.getElementById(ids[i]).firstChild.nodeValue = values[i];
  }

  function initClock() {
    updateClock();
    window.setInterval("updateClock()", 1);
  }

  new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'salesChart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [{
        year: '2008',
        value: 20
      },
      {
        year: '2009',
        value: 10
      },
      {
        year: '2010',
        value: 5
      },
      {
        year: '2011',
        value: 5
      },
      {
        year: '2012',
        value: 20
      }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Value']
  });
