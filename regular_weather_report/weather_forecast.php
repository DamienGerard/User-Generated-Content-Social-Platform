<?php
	$xmlWeatherstr = file_get_contents('http://api.weatherapi.com/v1/forecast.xml?key=aa62ba0f7bb0455b923145456202804&q=mauritius&days=7');
	$xmlDocDom = new DOMDocument();
	$xmlDocDom->loadXML($xmlWeatherstr);
	if($xmlDocDom->schemaValidate('weather_forecast.xsd')){
		$xmlWeatherDoc = new SimpleXMLElement($xmlWeatherstr);

		$location_name = $xmlWeatherDoc->location->name;
		$current_temp = $xmlWeatherDoc->current->temp_c;
		$current_condition_text = $xmlWeatherDoc->current->condition->text;
		$current_condition_icon = "http:".$xmlWeatherDoc->current->condition->icon;

		$forecast_data = array();
		$i = 0;
		foreach($xmlWeatherDoc->forecast->forecastday as $forecast_node){
			$dummy_date = $forecast_node->date;
			$forcast_dayname = date('l', strtotime($dummy_date));
			$forecast_data[$i]["dayname"] = $forcast_dayname;
			$forecast_data[$i]["max_temp"] = $forecast_node->day->maxtemp_c;
			$forecast_data[$i]["min_temp"] = $forecast_node->day->mintemp_c;
			$forecast_data[$i]["condition_text"] = $forecast_node->day->condition->text;
			$forecast_data[$i]["condition_icon"] = "http:".$forecast_node->day->condition->icon;
			$i++;
		}
	}else{
		die();
	}
?>

<link href="regular_weather_report/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<div class="main-wthree-row w3-container w3-card w3-white w3-round" style=" padding:0px; margin-top: 40px;">
			<div class="agileits-top">
				<div class="agileinfo-top-row">
					<div >
						<span><img style="width: 150px;" src="<?php echo $current_condition_icon; ?>" alt=""/></span>
					</div>
					<h3><?php echo $current_temp; ?><sup class="degree">°</sup><span>C</span></h3>
					<p><?php echo $location_name; ?><p><br><p><?php echo $current_condition_text; ?></p>
					<div class="agileinfo-top-time"> 
						<div class="date-time">
							<div class="dmy">
								<div id="txt"></div>
								<div class="date">
									<script type="text/javascript">
									var mydate=new Date()
									var year=mydate.getYear()
									if(year<1000)
									year+=1900
									var day=mydate.getDay()
									var month=mydate.getMonth()
									var daym=mydate.getDate()
									if(daym<10)
									daym="0"+daym
									var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
									var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
									document.write(""+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"")

									$(".main-wthree-row").ready(function(){
										startTime();
									});

									function startTime() {
										var today = new Date();
										var h = today.getHours();
										var m = today.getMinutes();
										var s = today.getSeconds();
										m = checkTime(m);
										s = checkTime(s);
										document.getElementById('txt').innerHTML =
										h + ":" + m + ":" + s;
										setTimeout(startTime, 500);
									}

									function checkTime(i) {
										if (i < 10) {i = "0" + i}; // add zero in front of numbers < 10
										return i;
									}
									</script>
								</div>
							</div> 
							<div class="clear"></div>
						</div>  
					</div>
				</div>
			</div>
			<div class="w3ls-bottom2">	 
				<!-- <div class="ac-container"> -->
					<!-- <input id="ac-1" name="accordion-1" type="checkbox" /> -->
					<h4 style="margin-top:15px; font-weight:bold; color:grey">Forecast</h4>
					<article class="ac-small">
						<div class="wthree-grids">
							<div class="wthree-grids-row">
								<ul class="top">
									<li><?php echo $forecast_data['1']["dayname"];?><br><p style="font-size:12px; font-weight:bold;"><?php echo $forecast_data['1']["condition_text"];?></p></li>
									<li class="wthree-img"><img src="<?php echo $forecast_data['1']["condition_icon"];?>" alt=""/> </li>
									<li class="wthree-temp"><?php echo $forecast_data['1']["max_temp"];?><sup class="degree">°</sup></li>
									<li class="wthree-temp"><?php echo $forecast_data['1']["min_temp"];?><sup class="degree">°</sup></li> 
								</ul> 
								<div class="clear"> </div>
							</div>
							<?php 
								for($i=2; $i<count($forecast_data); $i++){
									echo '<div class="wthree-grids-row">
											<ul>
												<li>'.$forecast_data[$i]["dayname"].'<br><p style="font-size:12px; font-weight:bold;">'.$forecast_data[$i]["condition_text"].'</p></li> 
												<li class="wthree-img"><img src="'.$forecast_data[$i]["condition_icon"].'" alt=""/> </li>
												<li class="wthree-temp">'.$forecast_data[$i]["max_temp"].'<sup class="degree">°</sup></li>
												<li class="wthree-temp">'.$forecast_data[$i]["min_temp"].'<sup class="degree">°</sup></li> 
											</ul>
											<div class="clear"> </div>
										</div>';
								}
							?>
							
							
						</div>
					</article>
				<!-- </div>   -->
			</div>	
		</div>		
