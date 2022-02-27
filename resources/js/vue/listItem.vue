<template>
    <div v-bind:style="{ display: 'flex', flexWrap: 'wrap' }" v-if="!show">
        <div v-bind:style="{ margin: '20px', width: '15%' }">{{contact.name}}</div>
        <div v-bind:style="{ margin: '20px', width: '15%' }">{{contact.email}}</div>
        <div v-bind:style="{ margin: '20px', width: '15%' }">{{contact.contact}}</div>
        <div v-bind:style="{ margin: '20px', width: '15%' }">{{contact.country}}</div>
        <div v-bind:style="{ margin: '20px', width: '5%' }"><button @click="show = true">Edit</button></div>
        <div v-bind:style="{ margin: '20px', width: '5%' }"><button @click="deleteContact()">Delete</button></div>
    </div>
    <div v-bind:style="{ display: 'flex' }" v-if="show">
    <input 
                type="text"
                name="name"
                placeholder="Name"
                v-model="contact.name"
                v-bind:style="{ margin: '20px', width: '15%' }"
            />
            <input 
                type="text"
                name="email"
                placeholder="Email"
                v-model="contact.email"
                v-bind:style="{ margin: '20px', width: '15%' }"
            />
            <input 
                type="text"
                name="contact"
                placeholder="Contact"
                v-model="contact.contact"
                v-bind:style="{ margin: '20px', width: '15%' }"
            />
            <input 
                type="text"
                name="country"
                placeholder="Country"
                v-model="contact.country"
                v-bind:style="{ margin: '20px', width: '15%' }"
            />
            <div v-bind:style="{ margin: '20px', width: '5%' }"><button @click="updateContact()">Update</button></div>
    </div>
</template>

<script>
export default {
    props: ["contact"],
    methods: {
        deleteContact() {
            axios.delete(`api/contacts/${this.contact.id}`)
            .then((res) => {
                this.$emit('contactChanged')
            })
            .catch((err) => console.log('There was an error deleting a contact: ', err))
        },
        updateContact() {
            axios.put(`api/contacts/${this.contact.id}`, {contact: this.contact})
            .then((res) => {
                this.$emit('contactChanged');
                this.show = false;
            })
            .catch((err) => console.log('There was an error deleting a contact: ', err))
        }
    },
    data: function() {
            return {
                show: false
            }
        },
}
</script>