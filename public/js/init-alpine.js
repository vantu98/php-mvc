function data() {
  return {
    isCartOpen: false,
    toggleCart() {
      this.isCartOpen = !this.isCartOpen;
    },
    closeCart() {
      this.isCartOpen = false;
    },

    isUserOpen: false,
    toogleUser() {
      this.isUserOpen = !this.isUserOpen;
    },
    closeUser() {
      this.isUserOpen = false;
    },
  };
}
