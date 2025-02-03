
export function authHasRole(role: string): boolean {
  return window.roles.includes(role);
}
