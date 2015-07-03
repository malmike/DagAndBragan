<?php
	function inspectionForm()
	{	
?>
		<form role="form" name="changeform" method="post" action="functioncalls.php?connect=team"> 
				<h3>INSPECTION REPORT<small><?php if($_SESSION['ERRMSG_ARR']) echo $_SESSION['ERRMSG_ARR'];?></small></h3>
				<div class="form-group"> 
					<label for="team_code">INQUIRY NO.</label> 
					<input type="number" class="form-control" name="id" id="id" placeholder = "Enter the inspection Inquiry Number"> 
				</div>

				Client Name	
				<div class="form-group"> 
					<label for="team_code">TOWN/ VILLAGES</label> 
					<input type="text" class="form-control" name="id" id="id" placeholder = "Enter the location of work"> 
				</div>		
				<div class="form-group"> 
					<label for="team_code">PROPOSED WORK DATE</label> 					
					<?php echo date_picker("workPlan")?>
				</div>

				<label for="team_code">BULDING TYPES</label> 
				<div class="form-group"> 
					
					<label class="checkbox-inline"> 
						<input type="checkbox" id="building1" value="Public Resident">Public Residential
					</label>						
					<label class="checkbox-inline"> 
						<input type="checkbox" id="building2" value="Public Commercial">Public Commercial
					</label>					
					<label class="checkbox-inline"> 
						<input type="checkbox" id="building3" value="Food Preparation">Food Preparation
					</label>
					<label class="checkbox-inline"> 
						<input type="checkbox" id="building4" value="Warehouse/ Store">Warehouse/ Store
					</label>
					<label class="checkbox-inline"> 
						<input type="checkbox" id="building5" value="OtherBuildings">Others
					</label>
				</div>
				
				<label for="team_code">BULDING USAGE</label>
				<div class="form-group"> 		
					<div class="radio"> 
						<label> <input type="radio" name="use" id="use1" value="Residential" checked> Residential</label>
                     </div>	
					<div class="radio"> 
						<label> <input type="radio" name="use" id="use1" value="Commercial" checked>Commercial</label>	
                    </div>
					<div class="radio"> 
						<label> <input type="radio" name="use" id="use1" value="Other" checked>Any other useful information</label>
				    </div>
                </div>
				<div class="form-group"> 
					<label for="team_code">NUMBER OF FLOORS</label> 
					<input type="number" class="form-control" name="floors" id="floors" placeholder = "Enter the number of floors"> 
				</div>		
				<div class="form-group"> 
					<label for="team_code">ESTIMATED AREA(sq m)</label> 
					<input type="number" class="form-control" name="area" id="area" placeholder = "Enter area in sq metres"> 
				</div>							
				<div class="form-group"> 
					<label for="team_code">NUMBER OF OCCUPANTS</label> 
					<input type="number" class="form-control" name="occupants" id="occupants" placeholder = "Enter number of occupants"> 
				</div>	
				<label for="team_code">PEST PROBLEMS</label> 
			<div class="form-group">  
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest1" value="Mosquitoes">Mosquitoes
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest2" value="Cockroaches">Cockroaches
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest3" value="Bats">Bats
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest4" value="Rodents">Rodents 
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest5" value="Bedbugs">Bedbugs 
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest6" value="Termites">Termites
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest7" value="Snakes">Snakes 
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest8" value="Lizards">Lizards 
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest9" value="Fleas">Fleas  
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest10" value="Weevils">Weevils   & other grain pests
					</label> 
					<label class="checkbox-inline"> 
						<input type="checkbox" id="pest11" value="OtherPests">Others                                            
					</label> 
			</div>
			<div class="form-group"> 
					<label for="team_code">EHS </label>
					<div class="checkbox"> <label class="checkbox-inline"><input type="checkbox" value="">Does client do EHS induction to visitors?</label>		
					<label><input type="checkbox" value="">Is there drinking water on site?</label></div>
					<div class="checkbox"> <label class="checkbox-inline"><input type="checkbox" value="">Is there high rise work on site?</label></div>
					<div class="checkbox"> <label><input type="checkbox" value="">Is building in good condition?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Does working alone apply on this job?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Does building have good ventilation?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Are there chances of fatigue on this job?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Are fire escape routes free of objects?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">What are the chances of fire or explosion?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Is the lighting adequate for work?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Is firefighting equip in place and serviced?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Are the toilet facilities adequate?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Are the surroundings clean and not bushy?</label></div> 		
					<div class="checkbox"> <label><input type="checkbox" value="">Is there a water body in the area?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Is there a game conservation area nearby?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Is there a medical facility nearby?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Are there other useful animals on site?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Is there need for heavy equipment?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Is there need for driving long hours?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Is there need for motorised equipment?</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Is there need for use of electrical equipment?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Are pests or vermin wild or protected species</label></div>	
					<div class="checkbox"> <label><input type="checkbox" value="">Does work involve spraying fruits or vegetables?</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Need for special training to do this work?</label></div>	
			</div>
		
			<div class="form-group"> 
					<label for="team_code">EHS Risk management tools</label>
					<div class="checkbox"> <label><input type="checkbox" value="">EHS site induction</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Shut down of voltage</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Emergency preparedness</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Fatigue control</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">First Aid kit</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">UWA</label></div>			
					<div class="checkbox"> <label><input type="checkbox" value="">PPE</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">MOH</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Customer safety guide</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Other authorities</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Work permit</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Safety harness</label></div>			
					<div class="checkbox"> <label><input type="checkbox" value="">Chemical containers</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Step ladder</label></div>			
					<div class="checkbox"> <label><input type="checkbox" value="">Sill kit</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Public transport</label></div>			
					<div class="checkbox"> <label><input type="checkbox" value="">Work signage</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Private transport</label></div>			
					<div class="checkbox"> <label><input type="checkbox" value="">Hazardous waste containers</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">4wd transport</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Fire extinguisher</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Anti-venom</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">Specific job training</label></div>		
					<div class="checkbox"> <label><input type="checkbox" value="">OTHERS</label></div>			
					<div class="checkbox"> <label><input type="checkbox" value="">Equipment serviced (records)</label></div>					
					<div class="checkbox"> <label><input type="checkbox" value="">Equipment calibrated</label></div>				
					<div class="checkbox"> <label><input type="checkbox" value="">Driving hours management</label></div>				
			</div>

		<div class="form-group"> 
		<label for="name">RESOURCES SELECTION</label> 
		Pesticides of Choice
		(Ref to IPM plan)	Pesticide	Quantity	Equipment	Quantity 
            </div>
            </form>
<?php
	}
?>
