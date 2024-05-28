<script setup lang="ts">
import { ref } from 'vue';
import { storeToRefs } from 'pinia';
import { useTodoStore } from '@/stores/todo';
import axios from 'axios';

const todoStore = useTodoStore();
const { todos } = storeToRefs(todoStore);

const titleInput = ref<HTMLInputElement>();
const descriptionInput = ref<HTMLInputElement>();

const submitForm = async () => {
    try {
        const response = await axios.post('https://todo-app.twntysmth.io/php/add-todo.php', {
            title: titleInput.value,
            description: descriptionInput?.value
        });
    } catch (error) {
        throw error;
    }
};
</script>

<template>
    <main>
        <form action="" @submit.prevent="submitForm" method="post">
            <input ref="titleInput" type="text" name="todo-title" />
            <input ref="descriptionInput" type="text" name="todo-description" />

            <button
                @click="
                    todoStore.addTodo({ title: titleInput?.value, description: descriptionInput?.value })
                ">
                add todo
            </button>
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

    <!--
    <div class="">
        <div>
            <input ref="title" type="text" name="todo-title" />
            <input ref="description" type="text" name="todo-description" />

            <button @click="todoStore.addTodo({ title: title?.value, description: description?.value })">
                add todo
            </button>
        </div>

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
    </div>
    -->
</template>
