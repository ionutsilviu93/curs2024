<template>
  <div>
    <h1>Telephone Directory</h1>
    <div>
      <input v-model="name" placeholder="Name" />
      <input v-model="phoneNumber" placeholder="Phone Number" />
      <button @click="saveContact">Save</button>
    </div>
    <ul>
      <li v-for="(contact, index) in contacts" :key="index">
        {{ contact.name }}: {{ contact.phoneNumber }}
        <button @click="deleteContact(index)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      phoneNumber: '',
      contacts: [],
    };
  },
  methods: {
    saveContact() {
      if (this.name && this.phoneNumber) {
        this.contacts.push({ name: this.name, phoneNumber: this.phoneNumber });
        this.name = '';
        this.phoneNumber = '';
        this.saveToLocalStorage();
      }
    },
    deleteContact(index) {
      this.contacts.splice(index, 1);
      this.saveToLocalStorage();
    },
    saveToLocalStorage() {
      localStorage.setItem('contacts', JSON.stringify(this.contacts));
    },
  },
  created() {
    const storedContacts = localStorage.getItem('contacts');
    if (storedContacts) {
      this.contacts = JSON.parse(storedContacts);
    }
  },
};
</script>
