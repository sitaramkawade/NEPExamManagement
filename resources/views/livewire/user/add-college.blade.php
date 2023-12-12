<div>
  <form wire:submit="add()">
 <input  wire:model="college_name" type="text" placeholder="Name"><br>

 <input  wire:model="college_email" type="email" placeholder="Email"><br>
 <textarea wire:model="college_address" cols="30" rows="5" placeholder="address"></textarea>
 <input  wire:model="college_contact_no" type="number" placeholder="contact"><br>
 <input  wire:model="college_website_url" type="text" placeholder="website url"><br>
 <input  wire:model="college_logo_path" type="text" placeholder="logo"><br>
 <input  wire:model="sanstha_id"type="number" placeholder="sansthan ID"><br>
 <input  wire:model="university_id" type="number" placeholder="university_ID"><br>
 <input wire:model="status" type="checkbox"> <label for="status">status</label><br>
 <button wire:model value="submit">Add</button>
</form>
</div>
