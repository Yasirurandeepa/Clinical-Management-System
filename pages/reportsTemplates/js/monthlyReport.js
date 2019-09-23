    $.get("php/getDailyIncomeReport.php", function (data, status) {
        let dates = [];
        let vals = [];
        let temp_html = '';
        if (data.length != 0 && data != 'false') {
            data = JSON.parse(data);
            for(let i=0;i<data.length;i++){
                dates.push(data[i].date);
                vals.push(parseInt(data[i].income));
                temp_html += '<tr>\n' +
                    '<td style="text-align:left;">'+data[i].date+'</td>\n' +
                    '<td style="text-align:right;">'+data[i].income+'.00</td>\n' +
                    '</tr>'
            }
            var tot = vals.reduce(add, 0);
            temp_html+=' <tr>\n' +
                '<td  style="text-align:left;"><b>Total income</b></td>\n' +
                '<td style="border-top:1px solid black;border-bottom: 3px double black;text-align: right;"><b>'+tot+'.00</b></td>\n' +
                '</tr>'
            $("#t-body").html(temp_html);
            // draw chart
            var ctx = document.getElementById("canvas");
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Income(USD)',
                        data: vals,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    scales: {
                        xAxes: [{
                            ticks: {
                                maxRotation: 90,
                                minRotation: 80
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        } else {
            console.log("Error");
        }
    });


    function getPDFFileButton () {
        // Select which div with id that need to be printed
        // to print body $('body')
        // here printing div with content id $("#content")
        // using html canvas to save as required pdf to image to preserve css
        return html2canvas($('#content'), {
            background: "#ffffff",
            onrendered: function(canvas) {
                var myImage = canvas.toDataURL("image/png");
                // Adjust width and height
                var imgWidth = (canvas.width * 40) / 240;
                var imgHeight = (canvas.height * 40) / 240;
                // jspdf changes
                var pdf = new jsPDF();
                pdf.addImage(myImage, 'JPEG', -10, 0, imgWidth, imgHeight); // 2: 19
                pdf.save('Kenway Medicals(Daily income report).pdf');
            }
        });

    }

    function add(a, b) {
        return a + b;
    }