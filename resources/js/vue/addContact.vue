<template>
    <div class="add-contact">
        <form>
            <input 
                type="text"
                name="name"
                placeholder="Name*"
                v-model="contact.name"
            />
            <input 
                type="text"
                name="email"
                placeholder="Email*"
                v-model="contact.email"
            />
            <input 
                type="text"
                name="contact"
                placeholder="Contact*"
                v-model="contact.contact"
            />
            <input 
                type="text"
                name="country"
                placeholder="Country*"
                v-model="contact.country"
            />
            <button @click.prevent="addContact()">Add</button>
        </form>
        <p>{{message}}</p>
    </div>
</template>

<script>
export default {
    data: function() {
            return {
                contact: {
                    name: "",
                    email: "",
                    contact: "",
                    country: "",
                },
                message: ""
            }
        },
    methods: {
        addContact() {
            if (this.contact.name === "" || this.contact.email === "" || this.contact.contact === "" || this.contact.country === "") {
                this.message = "Please fill in all required fields";
                return;
            } else {
            axios.post('api/contacts/store', {
                contact: this.contact
            })
            .then((res) => {
                this.contact.name = "";
                this.contact.email = "";
                this.contact.contact = "";
                this.contact.country = "";
                this.$emit('reloadList');
                this.message = "";
            })
            .catch((err) => console.log('There was an error adding a contact: ', err))
            }
        }
    },
}
</script>