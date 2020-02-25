function product_type() {
    var rusult = $.ajax({
        url: "insert_product_type.php",
        data: $('#product_type_f').serialize(),
        type: "POST",
        success: function(text) {
            var number_rows = $("#number_rows").val();
            //alert(text);
            if (text != "") {
                number_rows++;
                $("#number_rows").val(number_rows);
                var string = text.split("\"")[1];
                $("#p_type_current").append("\n" + number_rows + ". " + string + "\n");
            }
        }
    });
}

function delete_warehouse() {
    var r = confirm("ต้องการลบคลังใช่หรือไม่!!");
    if (r == true) {
        $.ajax({
            url: "delete_warehouse.php",
            data: $('#warehouse_f').serialize(),
            type: "POST",
            success: function() {
                $('#alert_s').fadeIn();
                setTimeout(function() {
                    $('#alert_s').fadeOut();
                    window.location.href = "index.php";
                }, 2000);
            }
        });
    }
}

function delete_product() {
    var r = confirm("ต้องการลบสินค้าใช่หรือไม่!!");
    if (r == true) {
        $.ajax({
            url: "delete_product.php",
            data: $('#product_form').serialize(),
            type: "POST",
            success: function() {
                $('#alert_p').fadeIn();
                setTimeout(function() {
                    $('#alert_p').fadeOut();
                    window.location.href = "index.php";
                }, 2000);
            }
        });
    }
}


var import_qty = [];
var import_type = [];
var export_qty = [];
var export_type = [];

$.ajax({
    url: "graph.php",
    success: function(text) {
        var json = JSON.parse(text);
        for (var i = 0; i < json.import.length; i++) {
            import_qty.push(json.import[i].data.qty);
            import_type.push(json.import[i].data.type);
        }
        for (var i = 0; i < json.export.length; i++) {
            export_qty.push(json.export[i].data.qty);
            export_type.push(json.export[i].data.type);
        }
        console.log("im_type : " + import_type);
        console.log("im_qty : " + import_qty);
        console.log("ex_type : " + export_type);
        console.log("ex_qty : " + export_qty);
    }
});
var config = {
			type: 'line',
			data: {
				labels: import_type,
				datasets: [{
					label: 'สินค้านำเข้า',
					data: import_qty,
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					fill: false,
					borderDash: [5, 5],
					pointRadius: 15,
					pointHoverRadius: 10,
				}]
			},
			options: {
				responsive: true,
				legend: {
					position: 'bottom',
				},
				hover: {
					mode: 'index'
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'ประเภทสินค้า',
              fontSize: 20
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'จำนวนสินค้า / ชิ้น',
              fontSize: 20
						}
					}]
				},
				title: {
					display: true,
					text: 'กราฟสินค้านำเข้าใน 1 ปี',
          fontSize: 22
				}
			}
};

var config2 = {
			type: 'line',
			data: {
				labels: export_type,
				datasets: [{
					label: 'สินค้าส่งออก',
					data: export_qty,
					backgroundColor: window.chartColors.orange,
					borderColor: window.chartColors.orange,
					fill: false,
					borderDash: [5, 5],
					pointRadius: 15,
					pointHoverRadius: 10,
				}]
			},
			options: {
				responsive: true,
				legend: {
					position: 'bottom',
				},
				hover: {
					mode: 'index'
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'ประเภทสินค้า',
              fontSize: 20
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'จำนวนสินค้า / ชิ้น',
              fontSize: 20
						}
					}]
				},
				title: {
					display: true,
					text: 'กราฟสินค้าส่งออกใน 1 ปี',
          fontSize: 22
				}
			}
};

window.onload = function() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myLine = new Chart(ctx, config);
    var ctx2 = document.getElementById('canvas2').getContext('2d');
    window.myLine = new Chart(ctx2, config2);
};
