package campaign

type Contact struct {
	Email string `validate:"email"`
}
