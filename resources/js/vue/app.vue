<template>
    <div class="contacts-container">
        <div class="heading">
            <h2 class="title">Contacts</h2>
            <add-contact
                v-on:reloadList="getList()"
            />
        </div>
        <br/>
        <list-contacts
            :contacts="contacts"
            v-on:reloadList="getList()"
        />
    </div>
</template>

<script>

import addContact from "./addContact.vue";
import listContacts from "./listContacts.vue"

export default {
    components: {
        addContact,
        listContacts
    },
    data: function() {
            return {
                contacts: []
            }
        },
    methods: {
        getList() {
            axios.get('api/contacts')
            .then((res) => {
                this.contacts = res.data;
            })
            .catch((err) => console.log('There was an error fetching contacts: ', err))
        }
    },
    created() {
        this.getList();
    },
}
</script>