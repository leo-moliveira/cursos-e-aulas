package main

import (
	"github.com/go-chi/chi/v5"
	"net/http"
)

func main() {
	r := chi.NewRouter()
	r.Get("/", func(w http.ResponseWriter, r *http.Request) {
		product := r.URL.Query().Get("product")
		id := r.URL.Query().Get("id")
		w.Write([]byte("Hello World " + product + " " + id))
	})

	r.Get("/{productName}", func(w http.ResponseWriter, r *http.Request) {
		productName := chi.URLParam(r, "productName")
		w.Write([]byte(productName))
	})

	http.ListenAndServe(":3000", r)
}
