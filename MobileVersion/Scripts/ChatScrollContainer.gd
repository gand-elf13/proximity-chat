class_name ChatScrollContainer
extends ScrollContainer


@onready var username_input := get_tree().current_scene.get_node("%UsernameTextEdit") as TextEdit
@onready var message_input := get_tree().current_scene.get_node("%MessageTextEdit") as TextEdit

func _on_button_pressed() -> void:
	print(username_input.text)
