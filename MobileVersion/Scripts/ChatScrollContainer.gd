class_name ChatScrollContainer
extends ScrollContainer


@onready var parent := get_parent () as VBoxContainer 
@onready var username_input := parent.get_node ("%UsernameTextEdit") as TextEdit
@onready var message_input := parent.get_node ("%MessageTextEdit") as TextEdit

@onready var MessageLabelScene := preload("res://message_label.tscn")


func add_message(display_text: StringName) -> void:
	pass


func _on_button_pressed () -> void:
	var username: StringName = username_input.text
	var message: StringName = message_input.text
	if username and message:
		var display_text: StringName = &"[b]%s : [/b]%s" % [username, message]
		
	print (username_input.text)
