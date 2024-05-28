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

    const loading = ref(false);
    const error = ref(null);

    const fetchTodos = async () => {
        try {
            loading.value = true;
            const response = await fetch('https://twntysmth.io/php/get-todos.php');
            if (!response.ok) {
                throw new Error('Failed to fetch todos');
            }
            const data = await response.json();
            todos.value = data;
        } catch (err) {
            throw Error;
        } finally {
            loading.value = false;
        }
    };

    return {
        todos,
        addTodo,
        loading,
        error,
        fetchTodos
    };
});
