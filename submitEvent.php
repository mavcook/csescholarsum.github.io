<?php
define("CODE_M_EMAIL", "code-m-board@umich.edu");
define("CODE_M_PRES_EMAIL", "sarthakb@umich.edu");
define("CODE_M_PRES_NAME", "Sarthak");
define("CURRENT_PAGE", "Event Submission");
?>

  <?php include 'includes/header.php' ?>
	
	
	<?php include 'submitEventServerCode.php' ?>


	<?php
		if (isset($_POST['hostEmail']))
			handlePost();
	?>
	<?php 
		$today = strtotime(date('Y-m-d')); 
		$dateStr = strtotime('+2 weeks', $today);
		$date = date('Y-m-d', $dateStr);
	?>
	
	<div class="container col-md-6" style="padding-top: 3em; padding-bottom: 3em " >
	<form method="post">
		<span class="sH1">Name of Event: </span><input type="text" name="eventName" placeholder="Intro to HTML Workshop" required/>
		<h1>Date and Time</h1>
		<span class="sH1">Date of Event: </span><input type="date" name="eventDate" min="<?php echo  $date ?>" required/>
		<span class="sH1">Time interval you are available to host the event: </span><br>
		<span class="sH2">Start Time</span><input type="time" name="startTime" required>
		<span class="sH2">End Time</span><input type="time" name="endTime" required>
		<span class="sH2">Preffered Start Time</span><input type="time" name="prefStartTime" required>
		<span class="sH2">Duration of Event (hours)</span><input type="number" name="eventDuration" step=".25" min=".25" max="100" required>
		* Example: I am availble to host this workshop from 5pm-10pm on this day. However, I would like the event to start at 6pm and go to 8pm. 
		Therefore my Start Time = 5pm, End Time = 10pm, Preffered Start Time = 6pm, Duration of Event = 2
		<h1>Location</h1>
		<span class="sH1">Is a room already reserved?</span>
			<p><input type="radio" id="roomIsReserved" name="isReserved" value="yes" checked onchange="allowInput('roomReservationDetails')"><label for="roomIsReserved">Yes</label></p>
			<p><input type="radio" id="roomNotReserved" name="isReserved" value="no" onchange="allowInput('roomReservationDetails')"><label for="roomNotReserved">No</label></p>
		<div id="roomReservationDetails">
			<span class="sH1">Campus:</span>
				<p><input type="radio" id="northRad" name="campus" value="North" checked disabled/><label for="northRad">North</label></p>
				<p><input type="radio" id="centRad" name="campus" value="Central" disabled/><label for="centRad">Central</label></p>

			<div class="input-field">
				<span class="sH1">Building Preference:</span>
				<input type="text" name="building" placeholder="DOW" disabled/>
			</div>
			<div class="input-field">
				<span class="sH1">Room Preference:</span>
				<input type="text" name="roomPref" placeholder="Shaquisha" disabled/>
			</div>
			<div class="input-field">
				<span class="sH1">Room Size Preference:</span>
				<select name="roomSize" disabled>
					<option value="none">None</option>
					<option value="large">Large</option>
					<option value="medium">Medium</option>
					<option value="small">Small</option>
				</select>
			</div>
			
		</div>
		<h1>Event Description</h1>
		<span class="sH1">1-2 Sentence description: </span><input type="text" name="desc" required>
		<span class="sH1">Full Description: </span><textarea name="fullDesc" rows="5" required></textarea>
		* Make sure to include details such as will students need to have software installed, 
		prior knowledge required, maybe even an agenda of the event.
		Format:
		Broad overview / goals of the event (like you are selling the event),
		What is the agenda (we will do this, then this, then this)
		What should attendees of the event know before coming to workshop?
		What should attendees bring to the workshop?
		What should attendees have installed?
		
		<div class="input-field">
			<span class="sH1">Type of Event:</span> 
			<select name="eventType" required>
				<option value="Workshop">Workshop</option>
				<option value="Tech Talk">Tech Talk</option>
				<option value="Social Event">Social Event</option>
				<option value="Other">Other</option>
			</select>
		</div>
		<h1>Host</h1>
		<span class="sH1">Host Email: </span><input type="text" name="hostEmail" placeholder="you@umich.edu" required>
		<span class="sH1">Cohost Email: </span><input type="text" name="cohostEmail" placeholder="indyJ@umich.edu">
		<span class="sH1">Submission Password: </span><input type="password" name="password" required>
		<input type="submit">
		* This data will be sent to room reservations and social media. Make sure your data is correct and typo free.
	</form>
	</div>
	<style>
		span{ font-size: 1.3em; }
	</style>
  <?php include 'includes/footer.php' ?>

