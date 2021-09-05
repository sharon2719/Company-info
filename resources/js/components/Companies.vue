<template>
  <div>
    <div class="container">
      <h2>Companies</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Companies
            <router-link to="/add" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Add Company</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="company in companies" :key="company.id">
                <td>{{ company.id }}</td>
                <td>{{ company.logo }}</td>
                <td>{{ company.name }}</td>
                <td>{{ company.email }}</td>
               
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'edit', params: { id: company.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteCompany(company.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      companies: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/companies").then((response) => {
      this.companies = response.data;
    });
  },
  methods: {
    deleteCompany(id) {
      this.axios
        .delete(`http://localhost:8001/api/companies/${id}`)
        .then((response) => {
          let i = this.companies.map((data) => data.id).indexOf(id);
          this.companies.splice(i, 1);
        });
    },
  },
};
</script>
                