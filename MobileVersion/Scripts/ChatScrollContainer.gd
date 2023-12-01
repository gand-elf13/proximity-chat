class_name ChatScrollContainer
extends ScrollContainer


@onready var parent := get_parent () as VBoxContainer 
@onready var username_input := parent.get_node ("%UsernameLineEdit") as LineEdit
@onready var message_input := parent.get_node ("%MessageLineEdit") as LineEdit
@onready var message_container := get_node ("MessageVBoxContainer") as VBoxContainer

@onready var MessageLabelScene: PackedScene = preload ("res://message_label.tscn")


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
	
