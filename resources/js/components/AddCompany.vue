<template>
  <div>
    <div class="container">
      <h2>Add Company</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Company
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Company List</router-link>
        </div>
        <div class="panel-body">

          <form @submit.prevent="addCompany">
             <div class="form-group">
              <label>logo</label>
              <input type="file" class="form-control" id="picture " @change="onFileChange"/>
            </div>

            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="company.name" />
            </div>

            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="company.email"
              />
            </div>
            

            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
import axios from 'axios'
export default {

  data() {
    return {
      logo:{},
      company: {},
      email: {}

    };
  },
  methods: {
    addCompany() {
      axios
        .post("http://localhost:8000/api/companies", this.company)
        .then((response) => this.$router.push({ name: "home" }))
        
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>