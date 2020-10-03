function data() {
  return {
    isCartOpen: false,
    toggleCart() {
      this.isCartOpen = !this.isCartOpen;
    },
    closeCart() {
      this.isCartOpen = false;
    },
  };
}
