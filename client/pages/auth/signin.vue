<template>
    <div class="section">
        <div class="container is-fluid">
            <div class="columns is-centered">
                <div class="column is-6">
                    <h1 class="title is-4">Sign in</h1>
                    <form action="" @submit.prevent="signin">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input type="email" v-model="form.email" class="input" placeholder="e.g. example@mail.com">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input type="password" v-model="form.password" class="input">
                            </div>
                        </div>

                        <div class="field">
                            <p class="control">
                                <button class="button is-info is-medium">Sign in</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  middleware: [
    'redirectIfAuthenticated',
  ],

  data() {
    return {
      form: {
        email: '',
        password: '',
      }
    };
  },

  methods: {
    async signin() {
      await this.$auth.loginWith('local', {
        data: this.form,
      });

      this.$router.replace(this.getRedirectRoute());
    },

    getRedirectRoute() {
      if (this.$route.query.redirect) {
        return this.$route.query.redirect
      }

      return { name: 'index' };
    }
  }
}
</script>