package main

import (
	"encoding/json"
	"github.com/go-chi/chi/v5"
	"github.com/go-chi/chi/v5/middleware"
	"github.com/go-chi/render"
	"net/http"
)

type product struct {
	ID   int
	Name string
}

func main() {
	r := chi.NewRouter()

	r.Use(middleware.RequestID)
	r.Use(middleware.RealIP)
	r.Use(middleware.Logger)
	r.Use(middleware.Recoverer)

	r.Get("/", func(w http.ResponseWriter, r *http.Request) {
		println("endpoint")
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

func myMiddleware(next http.Handler) http.Handler {
	return http.HandlerFunc(func(writer http.ResponseWriter, request *http.Request) {
		println("before")
		next.ServeHTTP(writer, request)
		print("after")
	})
}

func myMiddleware2(next http.Handler) http.Handler {
	return http.HandlerFunc(func(writer http.ResponseWriter, request *http.Request) {
		println("request ", request.Method, " URL ", request.RequestURI)
		next.ServeHTTP(writer, request)
	})
}
