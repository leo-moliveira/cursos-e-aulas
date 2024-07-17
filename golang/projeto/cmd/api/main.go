package main

import (
	"encoding/json"
	"github.com/go-chi/chi/v5"
	"github.com/go-chi/render"
	"net/http"
)

type product struct {
	ID   int
	Name string
}

type myHandler struct{}

func (m myHandler) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	w.Write([]byte("myHandler"))
}

func main() {
	r := chi.NewRouter()

	m := myHandler{}

	r.Handle("/handler", m)

	r.Get("/", func(w http.ResponseWriter, r *http.Request) {
		product := r.URL.Query().Get("product")
		id := r.URL.Query().Get("id")
		w.Write([]byte("Hello World " + product + " " + id))
	})

	r.Get("/{productName}", func(w http.ResponseWriter, r *http.Request) {
		productName := chi.URLParam(r, "productName")
		w.Write([]byte(productName))
	})

	r.Get("/json", func(w http.ResponseWriter, r *http.Request) {
		w.Header().Set("Content-Type", "application/json")
		obj := map[string]string{"message": "success"}
		b, _ := json.Marshal(obj)
		w.Write(b)
	})

	r.Get("/json2", func(w http.ResponseWriter, r *http.Request) {
		obj := map[string]string{"message": "success"}
		render.JSON(w, r, obj)
	})

	r.Post("/product", func(w http.ResponseWriter, r *http.Request) {
		var product product

		render.DecodeJSON(r.Body, &product)
		product.ID = 5

		render.JSON(w, r, product)
	})

	http.ListenAndServe(":3000", r)
}
