<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="" content="">
<link href="css/stat.css" rel="stylesheet" type="text/css" />    
 <script type="text/javascript" src="js/jquery.js"></script>
 
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        var jsonData = $.ajax({
          url: "getStatData.php",
          dataType: "json",
          async: false
          }).responseText;
           google.charts.load('current', {'packages':['corechart','table','line']});
           google.charts.setOnLoadCallback(drawTable);
          google.charts.setOnLoadCallback(drawChart);
           google.charts.setOnLoadCallback(drawChart2);
           
       function drawChart() {   
       var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

         var chart = new  google.visualization.PieChart(document.getElementById('pie_div'));
        chart.draw(data,options);
        }  
       function  drawTable() {
       var data = new google.visualization.DataTable(jsonData);
  
   var options = {
 	showRowNumber: true, 
 	width: '500px',
 	 height: '100%',
 	allowHtml: true,
 	cssClassNames: {tableCell : 'CenterClass',rowNumberCell :'CenterClass'}
                            }
      var table = new  google.visualization.Table(document.getElementById('table_div'));    
       table.draw(data, options);
     }
       function drawChart2() {
  var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Guardians of the Galaxy');
      data.addColumn('number', 'The Avengers');
      data.addColumn('number', 'Transformers: Age of Extinction');

      data.addRows([
        [1,  37.8, 80.8, 41.8],
        [2,  30.9, 69.5, 32.4],
        [3,  25.4,   57, 25.7],
        [4,  11.7, 18.8, 10.5],
        [5,  11.9, 17.6, 10.4],
        [6,   8.8, 13.6,  7.7],
        [7,   7.6, 12.3,  9.6],
        [8,  12.3, 29.2, 10.6],
        [9,  16.9, 42.9, 14.8],
        [10, 12.8, 30.9, 11.6],
        [11,  5.3,  7.9,  4.7],
        [12,  6.6,  8.4,  5.2],
        [13,  4.8,  6.3,  3.6],
        [14,  4.2,  6.2,  3.4]
      ]);

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 700,
        height: 300
      };

      var chart = new google.charts.Line(document.getElementById('Bar_div'));

      chart.draw(data, options);
        chart.draw(data, options);
}
    </script>
 </head>
    <body>
    <table align="center">
    <tr>
    	<td><div id="pie_div"></div> </td>
    	<td><div id="table_div"></div></td>
    </tr>
    <tr><td> <div id="Bar_div"></div></td> </tr>
   </table>
     <script type="text/javascript">
      $(document).ready(function($)     
   {
      });
   </script>    
</html>

