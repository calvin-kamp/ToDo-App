<script setup lang="ts">
import { ref } from 'vue';
import { storeToRefs } from 'pinia';
import { useTodoStore } from '@/stores/todo';
import axios from 'axios';

const todoStore = useTodoStore();
const { todos } = storeToRefs(todoStore);

const title = ref<HTMLInputElement>();
const description = ref<HTMLInputElement>();

const submitForm = async () => {
    try {
        const response = await axios.post('https://twntysmth.io/php/add-todo.php', {
            title: title.value,
            description: description?.value
        });

        todoStore.fetchTodos();
    } catch (error) {
        throw error;
    }
};
</script>

<template>
    <main>
        <form action="" @submit.prevent="submitForm" method="post">
            <input v-model="title" type="text" name="todo-title" />
            <input v-model="description" type="text" name="todo-description" />

            <button type="submit">add todo</button>
        </form>

        <ul>
            <li v-for="todo in todos">
                <strong style="display: block">
                    {{ todo.title }}
                </strong>

                <small v-if="todo?.description" style="display: block">
                    {{ todo.description }}
                </small>
            </li>
        </ul>
    </main>
</template>
