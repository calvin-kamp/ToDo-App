import { ref } from 'vue';
import { defineStore } from 'pinia';
import type { Todo } from '@/types/todo';

export const useTodoStore = defineStore('todo', () => {
    const todos = ref<Todo[]>([]);

    function addTodo(todo: Partial<Todo>) {
        if (todo?.title?.trim()) {
            todos.value.push({ title: todo.title, description: todo.description });
        }
    }

    return { todos, addTodo };
});
