<template>
    <div>
        <div v-bind:style="{ display: 'flex', backgroundColor: 'lightGrey', fontWeight: 'bold' }">
            <div v-bind:style="{ margin: '20px', width: '15%' }">Name</div>
            <div v-bind:style="{ margin: '20px', width: '15%' }">Email</div>
            <div v-bind:style="{ margin: '20px', width: '15%' }">Contact</div>
            <div v-bind:style="{ margin: '20px', width: '15%' }">Country</div>
        </div>
        <div v-for="(contact, index) in contacts" :key="index">
            <list-item
                :contact="contact"
                v-on:contactChanged="$emit('reloadList')"
                class="contact"
            />
        </div>
    </div>
</template>

<script>
import listItem from "./listItem.vue"

export default {
    props: ['contacts'],
    components: {
        listItem
    }
}
</script>