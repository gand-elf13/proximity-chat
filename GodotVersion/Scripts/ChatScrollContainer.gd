class_name ChatScrollContainer
extends ScrollContainer


@onready var parent := get_parent () as VBoxContainer 
@onready var username_input := parent.get_node ("%UsernameLineEdit") as LineEdit
@onready var message_input := parent.get_node ("%MessageLineEdit") as LineEdit
@onready var message_container := get_node ("MessageVBoxContainer") as VBoxContainer

@onready var MessageLabelScene: PackedScene = preload ("res://message_label.tscn")



func _ready():
	var ip_address = "8.8.8.8"  # Replace this with the IP address you want to get location for

	var url = "http://ipapi.co/" + ip_address + "/json/"

	var http_request = HTTPRequest.new()
	http_request.request_completed.connect(_on_request_completed)
	add_child(http_request)

	http_request.request(url)

func _on_request_completed(
	_result: int,
	response_code: int,
	_headers: PackedStringArray,
	body: PackedByteArray,
):
	if response_code == 200:
		var json: JSON = JSON.new()
		var body_string: StringName = body.get_string_from_utf8()
		var error: Error = json.parse(body_string)
		if not error:
			var data: Dictionary = json.data
			var city = data[&"city"]
			var country = data[&"country_name"]
			var region = data[&"region"]
			print(&"City: ", city)
			print(&"Region: ", region)
			print(&"Country: ", country)
		else:
			print(error)
	else:
		printerr(&"Failed to fetch data")

func add_message (display_text: StringName) -> void:
	var new_message := MessageLabelScene.instantiate ()
	message_container.call_deferred ("add_child", new_message)
	await message_container.child_entered_tree
	message_container.call_deferred ("move_child", new_message, 0)
	new_message.set_text (display_text)


func _on_button_pressed () -> void:
	var username: StringName = username_input.text
	var message: StringName = message_input.text
	if username and message:
		var display_text: StringName = &"[b]%s : [/b]%s" % [username, message]
		add_message (display_text)
	message_input.set_text (&"")
	
